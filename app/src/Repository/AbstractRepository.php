<?php

namespace App\Repository;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\interfaces\InterfaceRepository;

abstract class AbstractRepository implements InterfaceRepository
{
    protected EntityManagerInterface $em;
    protected $entityName;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em         = $em;
        $this->entityName = $em->getClassMetadata($this->entityName)->getName();
    }

    public function all(){
        dd($this->entityName);
        return $this->em->getRepository($this->entityName)->findAll();
    }

    public function find($id){
        return $this->em->getRepository($this->entityName)->find($id);
    }
    public function create(array $data)
    {
        $entity = new $this->entityName();

        foreach ($data as $property => $value) {
            $method = 'set' . ucfirst($property);
            if (method_exists($entity, $method)) {
                $entity->$method($value);
            }
        }

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
    public function update(array $data, $id)
    {

    }
    public function delete($id)
    {

    }
}