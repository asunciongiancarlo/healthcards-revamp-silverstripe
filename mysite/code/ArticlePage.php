<?php

class ArticlePage extends Page {

    private static $can_be_root = false;

    private static $db = array(
        'Title'       => 'Varchar(255)',
        'Intro'       => 'Text',
        'Author'      => 'Varchar(255)',
        'Content'     => 'Text',
        'ArticleDate' => 'Date',
        'Publish'     => 'Int'
    );

    private static $has_one = array(
        'Icon'     => 'Image',
        'Category' => 'ArticleCategory'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('Title','Title'),
               'Content');
        $fields->addFieldToTab('Root.Main', TextareaField::create('Intro')
               ->setDescription('Intro'),
               'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Author','Author/Writer'),
               'Content');
        $fields->addFieldToTab('Root.Main', TextareaField::create('Content')
                ->setDescription('Content'),
                'Content');
        $fields->addFieldToTab('Root.Main', DateField::create('ArticleDate','Date of article')
               ->setConfig('showcalendar',true),
               'Content');
        $fields->addFieldToTab('Root.Main', DropdownField::create('Publish','Publish',
            array('1'=>'Publish','0'=>'Unpublished'))
            ->setEmptyString('-Select-')
            );

        //Image
        $fields->addFieldToTab('Root.Attachments', $photo = UploadField::create('Icon'));
        $photo->getValidator()->setAllowedExtensions(array('jpg','jpeg','gif','png'));
        $photo->setFolderName('article-icon');

        //Category
        $fields->addFieldToTab('Root.Main', DropdownField::create(
            'Category',
            'Select category',
            $this->Parent()->Categories()->map('ID','Title')
        ));

        return $fields;
    }

}