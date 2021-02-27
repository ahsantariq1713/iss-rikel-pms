<?php

namespace App\Helpers;


use App\Models\Activity;

class ActivityLogger {
    public static function created($user,$entity)
    {
       ActivityLogger::crud($user,$entity, 'Created');
    }

    public static function updated($user,$entity)
    {
       ActivityLogger::crud($user,$entity, 'Updated');
    }

    public static function deleted($user,$entity)
    {
       ActivityLogger::crud($user,$entity, 'Deleted');
    }

    public static function operation($user,$entity, $operation)
    {
       ActivityLogger::crud($user,$entity, $operation);
    }

    private static function crud($user,$entity, $operation)
    {
        Activity::create([
            'user_id' => $user->id,
            'entity_id' => $entity->id,
            'entity_class' => class_basename($entity),
            'operation' => 'Created',
            'affected_entity_id' => null,
            'affected_entity_type' => null,
        ]);
    }

    public static function attached($user,$entity, $affectedEntity, $operation = 'Attached')
    {
        ActivityLogger::link($user,$entity, $affectedEntity, $operation);
    }

    public static function detached($user,$entity, $affectedEntity, $operation = 'Detached')
    {
        ActivityLogger::link($user,$entity, $affectedEntity, $operation);
    }

    private static function link($user,$entity, $affectedEntity, $operation)
    {
        Activity::create([
            'user_id' => $user->id,
            'entity_id' => $entity->id,
            'entity_class' => class_basename($entity),
            'operation' => $operation,
            'affected_entity_id' => $affectedEntity->id,
            'affected_entity_class' => class_basename($affectedEntity),
        ]);
    }
}
