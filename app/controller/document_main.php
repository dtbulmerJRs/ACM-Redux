<?php
/*!
 * \class Documents Main Page
 * \brief Contains the logic for the document main page
 * \author David Nuon <david@davidnuon.com>
 */

namespace Controller\Pages;
use Utility\FileList as FileList;
use Models\Documents\Minutes as Minutes;

class DocumentMain {
    public static function main($pageData, $viewData) {
        $viewData->setType('documents');
                       
        $minutesList = self::getMinutesList();
        $charterList = self::getCharterList();

        $viewData->setData('minutes-listing', $minutesList);
        $viewData->setData('charters', $charterList["open"]);
        $viewData->setData('closed-charters', $charterList["closed"]);
    }

    public static function getMinutesList($limit = -1) {

        $minutes            = new FileList(FILEROOT . '/static/data/minutes/');
        $minutesList        = $minutes->getDirList();

        $minutesPageListing = array();
        
        foreach ($minutesList as $minutesItem) {
            $stringArray = explode('/', $minutesItem);
            $date        = $stringArray[count($stringArray) - 1];
            
            $minutesPage = new Minutes('2', array(1), $date, 'General Meeting', rx_siteURL('minutes-view/' . $date));
            $minutesPageListing[] = $minutesPage->getData();
        }

        if($limit > 0) {
            $minutesPageListing = array_reverse($minutesPageListing);
            array_splice($minutesPageListing, $limit);
            return $minutesPageListing;
        } else {
            return array_reverse($minutesPageListing);
        }
    }

    public static function getCharterList() {
        $charters = new FileList(FILEROOT . '/static/data/charters/project/');        

        // Map all charters with a web url
        $projectCharters    = array_map(function($e) {
            return array( 'name' => $e, 
                'url'  => SITEROOT . 'static/data/charters/project/' . $e );
                
        }, $charters->getFileList(true));
        
        // Map all closed charters with a web url                        
        $closedCharters    = array_map(function($e) {
            return array( 'name' => $e, 
                'url'  => SITEROOT . 'static/data/charters/project/closed/' . $e );
                
        }, $charters->returnDir('closed')->getFileList(true));

        return array(
            "closed" => $closedCharters,
            "open"   => $projectCharters
        );
    }
}