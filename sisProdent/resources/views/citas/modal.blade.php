<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ci->id}}">
	{{!!Form::open(array('action'=>array('CitasController@destroy',$ci->id),'method'=>'delete'))!!}}

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Doctor</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Elilimar al Doctor</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" style="margin-left: 15px">Aceptar</button>
			</div>
		</div>
	</div>

	{{!!Form::close()!!}}
</div>
