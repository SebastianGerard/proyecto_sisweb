<h1>All users</h1>
<table border=2 align="center">
    <tr>
        <th>Type</th>
        <th>Price</th>
        <th>Capacity</th>
        <th>Amount</th>
    </tr>

 
    <?php foreach ($rooms as $room): ?>
    <tr>
        <td><?php    echo $this->Html->link( $room['Room']['type'],
array('controller' => 'rooms', 'action' => 'view', $room['Room']['id'])); ?>
      </td>
        <td>
       <?php echo $room['Room']['price']; ?>
        </td>
        <td><?php echo $room['Room']['capacity']; ?></td>

        <td><?php  echo$room['Room']['amount']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($room); ?>
</table>
 <a data-toggle="modal" href="#editUser" class="btn btn-primary btn-md">Editar Perfil</a>










           <form class="form-horizontal" role="form" action="/usuarios/update_user/" method="post">
              <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    		<h1>Hola</h1>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </form>

