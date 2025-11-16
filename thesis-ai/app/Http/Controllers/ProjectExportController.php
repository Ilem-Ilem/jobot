<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

class ProjectExportController extends Controller
{
    public function export(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $phpWord = new PhpWord();

        // Add a title page
        $section = $phpWord->addSection();
        $section->addTitle($project->title, 0);
        $section->addTextBreak(5);
        $section->addText('by ' . $project->user->name);

        // Add a table of contents
        $section->addTOC();

        // Add each chapter
        foreach ($project->chapters()->orderBy('chapter_order')->get() as $chapter) {
            $section->addTitle($chapter->title, 1);
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $chapter->content, false, false);
        }

        // Save the document
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $fileName = \Illuminate\Support\Str::slug($project->title) . '.docx';
        $objWriter->save(storage_path($fileName));

        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }

    public function exportPptx(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $presentation = new PhpPresentation();

        // Create a title slide
        $slide = $presentation->getActiveSlide();
        $shape = $slide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $textRun = $shape->createTextRun($project->title);
        $textRun->getFont()->setBold(true)->setSize(48)->setColor(new Color('FFE4C4DE'));

        // Create a slide for each chapter
        foreach ($project->chapters()->orderBy('chapter_order')->get() as $chapter) {
            $slide = $presentation->createSlide();
            $shape = $slide->createRichTextShape()
                ->setHeight(100)
                ->setWidth(800)
                ->setOffsetX(50)
                ->setOffsetY(50);
            $textRun = $shape->createTextRun($chapter->title);
            $textRun->getFont()->setBold(true)->setSize(36);

            $shape = $slide->createRichTextShape()
                ->setHeight(500)
                ->setWidth(800)
                ->setOffsetX(50)
                ->setOffsetY(150);
            $textRun = $shape->createTextRun(strip_tags($chapter->content));
            $textRun->getFont()->setSize(16);
        }

        // Save the presentation
        $objWriter = IOFactory::createWriter($presentation, 'PowerPoint2007');
        $fileName = \Illuminate\Support\Str::slug($project->title) . '.pptx';
        $objWriter->save(storage_path($fileName));

        return response()->download(storage_path($fileName))->deleteFileAfterSend(true);
    }
}
