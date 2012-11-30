<?php
/**
 * Collection Tree
 * 
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * @package Omeka\View\Helper
 */
class Omeka_View_Helper_FullCollectionTreeList extends Zend_View_Helper_Abstract
{
    /**
     * Build a nested HTML unordered list of the full collection tree, starting
     * at root collections.
     *
     * @param bool $linkToCollectionShow
     * @return string|null
     */
    public function fullCollectionTreeList($linkToCollectionShow = true)
    {
        $rootCollections = get_db()->getTable('CollectionTree')->getRootCollections();
        // Return NULL if there are no root collections.
        if (!$rootCollections) {
            return null;
        }
        $collectionTable = get_db()->getTable('Collection');
        $html = '<ul id="collection-tree-full-list">';
        foreach ($rootCollections as $rootCollection) {
            $html .= '<li>';
            if ($linkToCollectionShow) {
                $html .= link_to_collection(null, array(), 'show', $collectionTable->find($rootCollection['id']));
            } else {
                $html .= $rootCollection['name'] ? $rootCollection['name'] : '[Untitled]';
            }
            $collectionTree = get_db()->getTable('CollectionTree')->getDescendantTree($rootCollection['id']);
            $html .= $this->view->collectionTreeList($collectionTree, $linkToCollectionShow);
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
