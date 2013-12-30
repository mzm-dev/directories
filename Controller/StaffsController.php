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
public function index() {
$this->Staff->recursive = 0;
$this->set('staffs', $this->paginate());
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
}}
