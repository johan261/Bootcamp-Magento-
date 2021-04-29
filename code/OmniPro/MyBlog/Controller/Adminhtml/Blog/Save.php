<?php
namespace OmniPro\MyBlog\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Save extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'OmniPro_MyBlog::new';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param  \OmniPro\MyBlog\Api\Data\BlogInterfaceFactory
     */
    private $blogInterfaceFactory;

    /**
     * @param  \OmniPro\MyBlog\Api\Data\BlogRepositoryInterface
     */
    private $blogRepository;

    /**
     * @param  \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @param  \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @param  \Magento\Backend\App\Action\Context $context
     */

   
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \OmniPro\MyBlog\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
       \OmniPro\MyBlog\Api\BlogRepositoryInterface $blogRepository,
       \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
       \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->blogInterfaceFactory = $blogInterfaceFactory;
        $this->blogRepository = $blogRepository;
        $this->dataPersistor = $dataPersistor;
        $this->logger;
        return parent::__construct($context);
        
    }
    public function execute(){
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if($data) {
            $blog = $this->blogInterfaceFactory->create();
            $id = $this->getRequest()->getParam('id');
            if($id){
                try{
                    $blog = $this->blogRepository->getById($id);
                } catch (NoSuchEntityException $e){

                }
            }
            $blog->setBlog_titulo($data['blog_titulo']);
            $blog->setEmail($data['$blog_emailAutor']);
            $blog->setContent($data['$blog_contenido']);

            try{
                $this->blogRepository->save($blog);
                $this->messageManager->addSuccessMessage(__("el blog ha sido guardado exitosamente"));
            } catch(LocalizedException $e){
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch(\Exception $e){
                $this->messageManager->addExceptionMessage($e,__("Ha ocurrido un error al guardar el blog"));

            }
        }
        return $resultRedirect->setPath('*/*/index');
    } 
    /**
     * Is the user allowed to view the page.
     * 
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}
