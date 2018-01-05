<?php

class ArticleCategory extends DataObject {

    private static $db = array(
        'Title'   => 'Varchar(255)',
        'Publish' => 'Int'
    );

    private static $has_one = array(
        'ArticleHolder' => 'ArticleHolder'
    );

    private static $summary_fields = array (
        'Title' => 'Title',
        'Publish.Nice' => 'Publish',
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', TextField::create('Title'));
        $field = DropdownField::create('Publish', 'Publish', array('1'=>'Publish','0'=>'Unpublished'))
            ->setEmptyString('-Select one-');
        $fields->addFieldToTab('Root.Main', $field);

        return $fields;
    }


}