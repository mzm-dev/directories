<?php

App::uses('AppController', 'Controller');

/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 */
class StaffsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function list_view() {
        $this->Staff->recursive = 0;
        $staffs = $this->Staff->find('all');
        $this->set('staffs', $staffs);
    }
    public function grid_view() {
        $this->Staff->recursive = 0;
        $staffs = $this->Staff->find('all');
        $this->set('staffs', $staffs);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if (!empty($this->request->data['Staff']['query'])) {
            $conditions1 = array('OR' => array(
                    'Staff.name LIKE' => '%' . $this->request->data['Staff']['query'] . '%',
                    'Staff.email LIKE' => '%' . $this->request->data['Staff']['query'] . '%',
                ),
                'Staff.active' => 1,
            );
            $staffs = $this->Staff->generateTreeList($conditions1, null, null, '');
        } else {
            $conditions2 = array(
                'Staff.active' => 1,
            );
            $staffs = $this->Staff->generateTreeList($conditions2, null, null, '');
        }
        $staffs_array = array();
        foreach ($staffs as $k => $v) {
            $staffs_array[$k] = $this->Staff->find('first', array('conditions' => array('Staff.id' => $k)));
            $staffs_array[$k]['Staff']['path'] = $v;
        }
        $this->set(compact('staffs', 'staffs_array'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
        $this->set('staff', $this->Staff->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Staff->create();
            if ($this->Staff->save($this->request->data)) {
                $this->Session->setFlash(__('The staff has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $positions = $this->Staff->Position->find('list');
        $departments = $this->Staff->Department->find('list');
        $parentStaffs = $this->Staff->ParentStaff->find('list');
        $this->set(compact('positions', 'departments', 'parentStaffs'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Staff->exists($id)) {
            throw new NotFoundException(__('Invalid staff'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Staff->save($this->request->data)) {
                $this->Session->setFlash(__('The staff has been saved'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
            $this->request->data = $this->Staff->find('first', $options);
        }
        $positions = $this->Staff->Position->find('list');
        $departments = $this->Staff->Department->find('list');
        $parentStaffs = $this->Staff->ParentStaff->find('list');
        $this->set(compact('positions', 'departments', 'parentStaffs'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid staff'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Staff->delete()) {
            $this->Session->setFlash(__('Staff deleted'), 'flash/success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Staff was not deleted'), 'flash/error');
        $this->redirect(array('action' => 'index'));
    }

    public function movedown($id = null, $delta = null) {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Staff->moveDown($this->Staff->id, abs($delta));
        } else {
            $this->Session->setFlash('Please provide the number of positions the field should be moved down.');
        }

        return $this->redirect(array('action' => 'index'));
    }

    public function moveup($id = null, $delta = null) {
        $this->Staff->id = $id;
        if (!$this->Staff->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }

        if ($delta > 0) {
            $this->Staff->moveUp($this->Staff->id, abs($delta));
        } else {
            $this->Session->setFlash('Please provide a number of positions the category should be moved up.');
        }

        return $this->redirect(array('action' => 'index'));
    }

}
