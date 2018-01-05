<?php
/*
 * Holds the Category management
 * */
class ArticleHolder extends Page {

    private static $allowed_children = array(
        'ArticlePage'
    );


    private static $has_many = array (
        'Categories' => 'ArticleCategory'
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Categories', GridField::create(
            'Categories',
            'Article Categories',
            $this->Categories(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }


}