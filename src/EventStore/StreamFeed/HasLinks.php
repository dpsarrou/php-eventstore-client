<?php

namespace EventStore\StreamFeed;

/**
 * Class HasLinks
 * @package EventStore\StreamFeed
 */
trait HasLinks
{
    /**
     * @return array
     */
    abstract protected function getLinks();

    /**
     * @param  LinkRelation $relation
     * @return null|string
     */
    public function getLinkUrl(LinkRelation $relation)
    {
        $links = $this->getLinks();

        foreach ($links as $link) {
            if ($link['relation'] == $relation->toNative()) {
                return $link['uri'];
            }
        }

        return null;
    }

    /**
     * @param  LinkRelation $relation
     * @return boolean
     */
    public function hasLink(LinkRelation $relation)
    {
        return $this->getLinkUrl($relation) !== null;
    }
}
