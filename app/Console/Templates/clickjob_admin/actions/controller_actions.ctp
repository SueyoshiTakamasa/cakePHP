<?php
/**
 * Bake Template for Controller action generation.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.actions
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function <?php echo $admin ?>index() {
        $this-><?php echo $currentModelName ?>->recursive = 0;
        $this->Paginator->settings = array(
            'conditions' => array(
                '<?php echo $currentModelName ?>.deleted' => 0
            )
        );
        $this->set('<?php echo $pluralName ?>', $this->Paginator->paginate());
        $this->set('title_for_layout', __('<?php echo $currentModelName; ?>') . __('List'));
    }

    public function <?php echo $admin ?>view($id = null) {
        if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $options = array('conditions' => array('<?php echo $currentModelName; ?>.id' => $id, '<?php echo $currentModelName ?>.deleted' => 0));
        $this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->find('first', $options));
        $this->set('title_for_layout', __('<?php echo $currentModelName; ?>') . __('View'));
    }

<?php $compact = array(); ?>
    public function <?php echo $admin ?>add() {
        if ($this->request->is(array('post', 'put'))) {
            $this-><?php echo $currentModelName; ?>->create();
            if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
                $this->Session->setFlash(__('has been created.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be created. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
<?php else: ?>
                return $this->flash(__('The <?php echo strtolower($singularHumanName); ?> has been saved.'), array('action' => 'index'));
<?php endif; ?>
            }
        }
<?php
foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
    foreach ($modelObj->{$assoc} as $associationName => $relation):
        if (!empty($associationName)):
            $otherModelName = $this->_modelName($associationName);
            $otherPluralName = $this->_pluralName($associationName);
?>
        $<?php echo $otherPluralName ?> = $this-><?php echo $currentModelName ?>-><?php echo $otherModelName; ?>->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
<?php
            $compact[] = "'{$otherPluralName}'";
        endif;
    endforeach;
endforeach;
if (!empty($compact)):
    echo "\$this->set(compact(".join(', ', $compact)."));\n";
endif;
?>
        $this->set('title_for_layout', __('<?php echo $currentModelName; ?>') . __('Add'));
    }

<?php $compact = array(); ?>
    public function <?php echo $admin; ?>edit($id = null) {
        if (!$this-><?php echo $currentModelName; ?>->exists($id)) {
            throw new NotFoundException(__('Invalid Data'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this-><?php echo $currentModelName; ?>->save($this->request->data)) {
<?php if ($wannaUseSession): ?>
                $this->Session->setFlash(__('has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
<?php else: ?>
                return $this->flash(__('has been saved.'), array('action' => 'index'));
<?php endif; ?>
            }
        } else {
            $options = array('conditions' => array('<?php echo $currentModelName; ?>.id' => $id, '<?php echo $currentModelName ?>.deleted' => 0));
            $this->request->data = $this-><?php echo $currentModelName; ?>->find('first', $options);
        }
<?php
foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
    foreach ($modelObj->{$assoc} as $associationName => $relation):
        if (!empty($associationName)):
            $otherModelName = $this->_modelName($associationName);
$otherPluralName = $this->_pluralName($associationName);
?>
        $<?php echo $otherPluralName ?> = $this-><?php echo $currentModelName ?>-><?php echo $otherModelName; ?>->find('list', array('conditions' => array('deleted' => 0), 'recursive' => -1));
<?php
$compact[] = "'{$otherPluralName}'";
endif;
endforeach;
endforeach;
if (!empty($compact)):
    echo "\$this->set(compact(".join(', ', $compact)."));\n";
endif;
?>
         $this->set('title_for_layout', __('<?php echo $currentModelName; ?>') . __('Edit'));
    }

    public function <?php echo $admin; ?>delete($id = null) {
        $this-><?php echo $currentModelName; ?>->id = $id;
        if (!$this-><?php echo $currentModelName; ?>->exists()) {
            throw new NotFoundException(__('Invalid Data'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this-><?php echo $currentModelName; ?>->set(array('deleted' => 1));
        if ($this-><?php echo $currentModelName; ?>->save()) {
<?php if ($wannaUseSession): ?>
            $this->Session->setFlash(__('has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
<?php else: ?>
            return $this->flash(__('has been deleted.'), array('action' => 'index'));
        } else {
            return $this->flash(__('could not be deleted. Please, try again.'), array('action' => 'index'));
        }
<?php endif; ?>
    }
