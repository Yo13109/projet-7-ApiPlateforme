<?php namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Customer;
use App\Entity\Reseller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CustomerDataPersister extends AbstractController implements ContextAwareDataPersisterInterface 
{
    public function __construct(ContextAwareDataPersisterInterface $decorated)
    {
        $this->decorated = $decorated;
    
    }
    public function supports($data, array $context = []): bool
    {
       return $data instanceof Customer;
       
    }

    public function persist($data, array $context = [])
    {
        $data->setReseller($this->getUser());
        $result = $this->decorated->persist($data, $context);

        
        
            
        
        
      
        
    }

    public function remove($data, array $context = [])
    {
        return $this->decorated->remove($data, $context);
    }
}