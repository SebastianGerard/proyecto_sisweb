
<?php class UsuariosController extends AppController {

    public $helpers = array('Html', 'Form');
    public function registrar() {
        if($this->request->is('post'))
        {
            $this->Usuario->create();
            $this->Usuario->save($this->request->data);
            $this->Session->setFlash(__('Usuario guardado'));
            $this->redirect(array('action'=>'index'));
        }
        else
        $this->set('registrar');
    }
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
}?>