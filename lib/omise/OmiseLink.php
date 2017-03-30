<?php

require_once dirname(__FILE__).'/res/OmiseApiResource.php';

class OmiseLink extends OmiseApiResource
{
    const ENDPOINT = 'links';

    /**
     * Retrieves a link.
     *
     * @param  string $id
     * @param  string $publickey
     * @param  string $secretkey
     *
     * @return OmiseLink
     */
    public static function retrieve($id = '', $publickey = null, $secretkey = null)
    {
        return parent::g_retrieve(get_class(), self::getUrl($id), $publickey, $secretkey);
    }

    /**
     * Search for links.
     *
     * @param string query
     *
     * @return OmiseSearch
     */
    public static function search($query = '', $publickey = null, $secretkey = null)
    {
        return OmiseSearch::scope('link', $publickey, $secretkey)->query($query);
    }

    /**
     * (non-PHPdoc)
     *
     * @see OmiseApiResource::g_reload()
     */
    public function reload()
    {
        if ($this['object'] === 'link') {
            parent::g_reload(self::getUrl($this['id']));
        } else {
            parent::g_reload(self::getUrl());
        }
    }

    /**
     * Creates a new link.
     *
     * @param  array  $params
     * @param  string $publickey
     * @param  string $secretkey
     *
     * @return OmiseLink
     */
    public static function create($params, $publickey = null, $secretkey = null)
    {
        return parent::g_create(get_class(), self::getUrl(), $params, $publickey, $secretkey);
    }

    /**
     * @param  string $id
     *
     * @return string
     */
    private static function getUrl($id = '')
    {
        return OMISE_API_URL.self::ENDPOINT.'/'.$id;
    }
}
