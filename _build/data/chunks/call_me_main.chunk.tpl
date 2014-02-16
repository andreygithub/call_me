<!-- Modal -->
<div class="modal fade" id="call_me_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content form-horizontal" id="call_me" role="form" method="post" action="[[~[[*id]]]]">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Обратный звонок. Мы вам перезвоним в ближайшее время</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="callme_name" class="col-sm-4 control-label">Ваше имя:</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" id="callme_name" name='name' placeholder="Ваше имя" required>
          </div>
        </div>  
        <div class="form-group">
          <label for="callme_tel" class="col-sm-4 control-label">Телефон:</label>
          <div class="col-sm-8">
              <input type="tel" class="form-control" id="callme_tel" name='phone' placeholder="Телефон" required maxlength="15">
          </div>
        </div>
      </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary" id="callme_submit">Заказать звонок</button>
      </div>
    </form><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
