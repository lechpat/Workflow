<?php

namespace Workflow\Controller;

use App\Controller\Admin\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController
{
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->layout = 'settings';
    }
}
