<div id="content-config">
    <div class="modal-header py-2">
        <h5 class="modal-title" id="exampleModalLabel">
            <b>{{trans('sica::menu.Do you want to delete the following title?')}}</b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {!! Form::open(['route'=>'sica.admin.academy.course.destroy', 'method'=>'POST', 'id'=>'form-config']) !!}
        <div class="modal-body px-4 pt-3" style="font-size: 20px;">
            {!! Form::hidden('id', $course->id) !!}
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.Fiche')}}</b></div>
                <div class="col-8">{{ $course->code }}</div>
            </div>
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.Name')}}</b></div>
                <div class="col-8">{{ $course->program->name }}</div>
            </div>
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.Start Date')}}</b></div>
                <div class="col-8">{{ $course->star_date }}</div>
            </div>
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.End Date')}}</b></div>
                <div class="col-8">{{ $course->end_date }}</div>
            </div>
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.Status')}}</b></div>
                <div class="col-8">{{ $course->status }}</div>
            </div>
            <div class="row">
                <div class="col-4 text-right"><b>{{trans('sica::menu.Deschooling')}}</b></div>
                <div class="col-8">{{ $course->deschooling }}</div>
            </div>
        </div>
        <div class="modal-footer py-1">
                <button type="button" class="btn btn-secondary btn-md py-0" data-dismiss="modal">{{trans('sica::menu.Cancel')}}</button>
                {!! Form::submit(trans('sica::menu.Delete'), ['class'=>'btn btn-danger btn-md py-0']) !!}
        </div>
    {!! Form::close() !!}
</div>

<script>
    $('#form-config').submit(function () { /* Effect for status sending information */
        $('#loader-message').text('Enviando información...'); /* Add content to loader */
        $("#content-config").hide(); /* Hide the content of the modal */
        $('#modal-content').append($('#modal-loader').clone()); /* Add the loader to the modal */
    });
</script>