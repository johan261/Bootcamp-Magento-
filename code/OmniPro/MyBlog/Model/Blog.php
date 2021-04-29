<?php
namespace OmniPro\MyBlog\Model;

use OmniPro\MyBlog\Api\Data\BlogExtensionInterface;
use Magento\Framework\Api\AttributeValueFactory;
use Magento\Framework\Api\ExtensionAttributesFactory;


class Blog extends \Magento\Framework\Model\AbstractExtensibleModel implements \Magento\Framework\DataObject\IdentityInterface, \OmniPro\MyBlog\Api\Data\BlogInterface
{
    const CACHE_TAG = 'omnipro_myblog_blog';
    const BLOG_TITULO = 'blog_titulo';
    const EMAIL = 'blog_emailAutor';
    const CONTENT = 'blog_contenido';
    const IMG = 'blog_urlimagen';
    const ID = 'blog_id';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'blog';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $customAttributeFactory
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $customAttributeFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\OmniPro\MyBlog\Model\ResourceModel\Blog::class);
    }

    /**
     * Return a unique id for the model.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setId($blog_id)
    {
       $this->setData(self::ID, $blog_id);
    }

    public function getBlog_titulo()
    {
        return $this->getData(self::BLOG_TITULO);
    }
    public function setBlog_titulo($blog_titulo)
    {
        $this->setData(self::BLOG_TITULO, $blog_titulo);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($blog_contenido) {
        $this-> setData(self::CONTENT, $blog_contenido);
    } 

    public function getEmail(){
        return $this->getData(self::EMAIL); 
    } 

    public function setEmail($blog_emailAutor){
        $this->setData(self::EMAIL, $blog_emailAutor);
    }

    public function getImg(){
        return $this->getData(self::IMG);
    }
    public function setImg($blog_urlimagen){
       $this->setData(self::IMG, $blog_urlimagen);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(BlogExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
    

}

