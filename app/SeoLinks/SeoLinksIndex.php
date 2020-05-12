<?php

namespace App\SeoLinks;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoLinksIndex
{
    public static function getLinks($title, $description, $graphUrl, $canonical, $twitterLink, $image)
    {
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl($graphUrl);
        SEOTools::setCanonical($canonical);
        SEOTools::opengraph()->addProperty('type', 'estate');
        SEOTools::opengraph()->addProperty('type', 'عقار');
        SEOTools::opengraph()->addProperty('type', 'موقع عقارى');
        SEOTools::opengraph()->addProperty('type', 'موقع خدمات عقارية وحكومية');
        SEOMeta::addKeyword(['عقار', 'موقع عقارى', 'موقع خدمات عقارية وحكومية']);
        SEOTools::twitter()->setSite($twitterLink);
        SEOTools::jsonLd()->addImage($image);
    }
}