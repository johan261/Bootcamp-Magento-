<?php
namespace OmniPro\MyBlog\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;
use \Magento\Framework\Exception\LocalizedException;

class save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;
    protected $_blogInterfaceFactory;
    protected $_blogRepository;
    protected $uploaderFactory;
    protected $adapterFactory;
    protected $filesystem;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \OmniPro\MyBlog\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
       \OmniPro\MyBlog\Api\BlogRepositoryInterface $blogRepository,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_blogRepository = $blogRepository;
        $this->_blogInterfaceFactory = $blogInterfaceFactory;
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $params = $this->_request->getParams();
        /**
         * @var \OmniPro\MyBlog\Model\Blog $blog
         */
        $blog = $this->_blogInterfaceFactory->create();
        $blog->setBlog_titulo($params['titulo'] ?? ''); 
        $blog->setEmail($params['emailAutor'] ?? '');
        $blog->setContent($params['contenido'] ?? '');
        $blog->setImg($params['log_urlimagenAdapter'] ?? '');
        $this->_blogRepository->save($blog);

        $data = $this->getRequest()->getParams();

        if(isset($_FILES[' blog_urlimagen']['name']) && $_FILES[' blog_urlimagen']['name'] != '') {
            try{
                $uploaderFactory = $this->uploaderFactory->create(['fileId' => 'blog_urlimagen']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->addValidateCallback('custom_image_upload',$imageAdapter,'validateUploadFile');
                $uploaderFactory->setAllowRenameFiles(true);
                $uploaderFactory->setFilesDispersion(true);
                $mediaDirectory = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA);
                $destinationPath = $mediaDirectory->getAbsolutePath('myblog/form');
                $result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                $imagePath = 'myblog/form'.$result['file'];
                $data['log_urlimagenAdapter'] = $imagePath;
            } catch (\Exception $e) {
            }
        }
        


         /**
         * @var  \Magento\Framework\Controller\Result\Json $result
         */
    
         return $this->_redirect('*/*/');
    }
}
