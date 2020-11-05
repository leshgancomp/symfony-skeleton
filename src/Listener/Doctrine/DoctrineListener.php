<?php

namespace App\Listener\Doctrine;

use Doctrine\ORM\Event\PreFlushEventArgs;

class DoctrineListener {

    public function preFlush(PreFlushEventArgs $event) {
        $em = $event->getEntityManager();

        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            if (method_exists($object, "getIsDeleted")) {
                if ($object->getIsDeleted() instanceof \DateTime) {
                    continue;
                } else {
                    $object->setIsDeleted(new \DateTime());
                    $em->merge($object);
                    $em->persist($object);
                }
            }
        }
    }

}
