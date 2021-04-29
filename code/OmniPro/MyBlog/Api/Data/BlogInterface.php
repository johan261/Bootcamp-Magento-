<?php
namespace OmniPro\MyBlog\Api\Data;

use OmniPro\SimpleCategoryAttribute\Controller\Prueba\Omnipro;

interface BlogInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
  
    /**
     * Return ID
     * 
     * @return int
     */
    public function getId();

    /**
     * Set ID
     * 
     * @param int $blog_id
     * @return void
     */
    public function setId($blog_id);
  
    /**
     * Return Blog_titulo
     *
     * @return string
     */
    public function getBlog_titulo();
    

     /**
      * Set Blog_titulo
      *
      * @param string $blog_titulo
      * @return void
      */
    public function setBlog_titulo($blog_titulo);
    /**
     * Set Email
     *
     * @param string $blog_emailAutor;
     * @return void
     */
    public function setEmail($blog_emailAutor);
     /**
     * Get Email
     *
     * @param string $blog_emailAutor;
     * @return void
     */
    public function getEmail();
    /**
     * Set Content
     *
     * @param string $blog_contenido
     * @return void
     */
    public function setContent($blog_contenido);
     /**
     * Get Content
     *
     * 
     * @return string
     */
    public function getContent();
    /**
     * Set Img
     *
     * @param string $blog_urlimagen
     * @return void
     */
    public function setImg($blog_urlimagen);
    /**
     * Get Img
     *
     * @return string
     */
    public function getImg();
    /**
     * @return \OmniPro\MyBlog\Api\Data\BlogExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \OmniPro\MyBlog\Api\Data\BlogExtensionInterface $extensionAttributes
     * @return $this
     */

     public function setExtensionAttributes(\Omnipro\MyBlog\Api\Data\BlogExtensionInterface $extensionAttributes);
}
