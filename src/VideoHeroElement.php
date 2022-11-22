<?php

namespace BiffBangPow\Element;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use UncleCheese\DisplayLogic\Forms\Wrapper;

class VideoHeroElement extends BaseElement
{
    private static $table_name = 'VideoHeroElement';
    private static $inline_editable = false;
    private static $has_one = [
        'HeroImage' => Image::class,
        'VideoFile' => File::class
    ];
    private static $owns = [
        'HeroImage',
        'VideoFile'
    ];
    private static $db = [
        'Title' => 'Varchar',
        'Content' => 'HTMLText',
        'BannerType' => 'Varchar'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(['VideoFile']);
        $fields->addFieldsToTab('Root.Main', [
            DropdownField::create('BannerType', 'Banner Type', [
                'image' => 'Image Banner',
                'video' => 'Video Banner'
            ]),

            UploadField::create('HeroImage', 'Image')
                ->setAllowedFileCategories('image/supported')
                ->setFolderName('hero')
                ->setDescription('If the banner is set to video, this will be used as a poster image, so should still be added'),
            Wrapper::create(
                UploadField::create('VideoFile')
                    ->setFolderName('hero-video')
                    ->setAllowedExtensions(['webm', 'mp4'])
                    ->setDescription('Video should be in mp4 or webm format, does not need sound and should be ideally less than around 20 seconds')
            )->displayIf("BannerType")->isEqualTo("video")->end()
        ]);
        return $fields;
    }

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Hero / Video Banner (with content)');
    }

    public function getSimpleClassName()
    {
        return 'bbp-video-hero';
    }
}
