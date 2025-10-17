<x-templete_top :data="$data" />



{{-- notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
  <strong>{{ $errors->first('file') }}</strong>
</span>
@endif


<div class="row">
  <div class="col-md-8">

    <!-- Basic layout-->
    <div class="card">

      <div class="card-header header-elements-inline">


        <h5 class="card-title">{{$data['page_tittle']??''}}</h5>
        <div class="header-elements">
          <div class="list-icons">


            <form action="/{{$mainroute}}" method="GET">

              <div class="form-group row">

                <div class="input-group">
                  <input type="text" name="search" id="search" value="{{$search ?? ''}}" class="form-control" placeholder="Search Here">
                  <span class="input-group-append">
                    <span class="input-group-text"><i class="icon-search4"></i></span>

                    <span class="input-group-text">
                      <a class="list-icons-item" data-action="collapse"></a>
                    </span>

                    <!-- edit view -->
                    @if(!empty($editview))
                    <span class="input-group-text"  >
                    <div id="editview"><a onclick="editview('{{count($listdata)}}')"><i class="icon-dots"></i></a></div>
                    <div id="cancelview" style="display: none;"><a onclick="cancelview('{{count($listdata)}}')"><i class="icon-cross3" style="color: red;"></i></a></div>
                    </span>
                    <span class="input-group-text" style="display: none;"  id="accview">
                    <a onclick="accview()"><i class="icon-checkmark3" style="color: green;"></i></a>
                    </span>
                    @endif
      
                  </span>
                </div>
              </div>
            </form>
            <!-- <a class="list-icons-item" data-action="collapse"></a>
            <a class="list-icons-item" data-action="reload"></a> -->
            <!-- <a class="list-icons-item" data-action="remove"></a> -->
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
        <table id="tData" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
              <tr>
                @php $cols = count($grid)+1; @endphp
                @foreach($grid as $datagrid)
                  @if($datagrid['type'] == 'hidden')
                    <th width="{{$datagrid['width']}}" class="hide" hidden>{{$datagrid['label']}}</th>
                  @else
                    <th width="{{$datagrid['width']}}">{{$datagrid['label']}}</th>
                  @endif
                @endforeach
                <th width="12%">ACTION</th>
              </tr>
            </thead>
            <tbody class="media-list media-list-container" id="media-list-target-left">
              @if(!$listdata->isEmpty())
              @php
              $rowIndex=-1;
              $i = 0;
              @endphp

              @foreach($listdata as $key => $data)
              <tr>
                @php
                $pmKey=$data->$primaryKey;
                $rowIndex ++;
                @endphp

                @foreach($grid as $datagrid)
                @php
                $field=$datagrid['field'];
                $value=$data->$field;
                @endphp
                @if($datagrid['type'] == 'image')
                <td width="{{$datagrid['width'] ?? ''}}" class="{{$datagrid['class'] ?? ''}}">
                  <a href="{{$value}}" data-popup="lightbox">
                    <img src="{{$value}}" width="50px" alt="" class="img-preview rounded">
                  </a>
                </td>
                @elseif($datagrid['type'] == 'hidden')
                <td width="{{$datagrid['width'] ?? ''}}" class="{{$datagrid['class'] ?? ''}}" hidden>{{$value}}</td>
                @else
                  @if(!empty($paramlak) and $datagrid['field'] == 'seqno')
                    <td width="{{$datagrid['width'] ?? ''}}" class="{{$datagrid['class'] ?? ''}}">
                      <i class="icon-dots dragula-handle" id="dropmovelak{{$key+1}}" style="display: none;"></i>
                      <input type="hidden" id="gridPmKeylak{{$rowIndex}}" name="gridPmKeylak{{$rowIndex}}" value="{{$pmKey}}">
                      {{$value}}
                    </td>
                  @else
                    <td width="{{$datagrid['width'] ?? ''}}" class="{{$datagrid['class'] ?? ''}}" onclick="editfield(this);">{{$value}}</td>
                  @endif
                @endif
                @endforeach
                <td>
                  <center>
                    <i class="icon-dots dragula-handle" id="dropmove{{$key+1}}" style="display: none;"></i>
                    <input type="hidden" id="gridPmKey{{$rowIndex}}" name="gridPmKey{{$rowIndex}}" value="{{$pmKey}}">
                    <a onclick="grid_edit({{$pmKey}},{{$primaryKey}})" style=" color: green; padding:4px;max-width: 30px;max-height: 30px;"><i class="icon-pencil" aria-hidden="true"></i></a>
                    <a onclick="grid_delete({{$pmKey}},{{$primaryKey}})" style="color: red; padding:4px;max-width: 30px;max-height: 30px;"><i class="icon-trash" aria-hidden="true"></i></a>
                  </center>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="{{$cols}}">
                  <center><i class="fa fa-info-circle"></i> Data Empty </center>
                </td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        <br>
        <div class="text-right">
          {{ $listdata->appends(array('search' => $search ?? ''))->links('pagination::bootstrap-4') }}
        </div>
      </div>


    </div>

    <!-- /basic layout -->
  </div>

  <div class="col-md-4">

    <!-- Basic layout-->
    <div class="card">
      <div class="card-header header-elements-inline">
        <h5 class="card-title">Form Input</h5>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
            <!-- <a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a> -->
          </div>
        </div>
      </div>

      <div class="card-body">
        <!-- <form action="#"> -->
        <input type="hidden" id="alldata" name="alldata" value="{{json_encode($listdata)}}">
        <input type="hidden" id="formAllField" name="formAllField" value="{{json_encode($form)}}">
        <input type="hidden" id="{{$primaryKey}}" name="{{$primaryKey}}" value="">
        <input type="hidden" id="compId" name="compId" value="{{$compId}}">
        <input type="hidden" id="countform" name="countform" value="{{count($listdata)}}">

        <div class="row">
          @csrf
          @foreach($form as $dataform)
          @if($dataform['type']=='text')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="text" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='hidden')
          <div class="form-group">
            <input type="hidden" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
          </div>
          @elseif($dataform['type']=='number')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="number" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='date')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="date" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='datetime')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="datetime-local" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='time')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="time" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='color')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="color" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='file')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="file" class="form-control-uniform" id="{{$dataform['field']}}" name="{{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='image')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="file" class="form-control-uniform" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" onchange="convert64(this)" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <input type="hidden" id="{{$dataform['field']}}_hidden" name="{{$dataform['field']}}_hidden">
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='angka')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="text" class="AutoNumericDot angka form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='textarea')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <textarea class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" cols="20" rows="4" placeholder="{{$dataform['placeholder']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif></textarea>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='password')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="password" class="form-control" id="{{$dataform['field']}}" name="{{$dataform['field']}}" placeholder="{{$dataform['placeholder']}}" requ @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
            </div>
          </div>
          @elseif($dataform['type']=='combo')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <label class="form-label"><b>{{$dataform['label']}}</b></label>
            <div class="form-group">
              <select name="{{$dataform['field']}}" id="{{$dataform['field']}}" class="form-control {{$dataform['field']}}" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
                <option value="">{{$dataform['default']}}</option>
                @foreach($dataform['combodata'] as $key => $combodata)
                <option value="{{$combodata['comboValue']}}">{{$combodata['comboLabel']}}</option>
                @endforeach
              </select>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
              <script>
                $(".{{$dataform['field']}}").select2({
                  placeholder: "{{$dataform['default']}}",
                  minimumResultsForSearch: Infinity
                });
              </script>
            </div>
          </div>
          @elseif($dataform['type']=='autocomplete')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <input type="hidden" id="id{{$dataform['field']}}" name="id{{$dataform['field']}}">
              <input type="hidden" id="kd{{$dataform['field']}}" name="kd{{$dataform['field']}}">
              <input type="hidden" id="nm{{$dataform['field']}}" name="nm{{$dataform['field']}}">
              <select name="{{$dataform['field']}}" id="{{$dataform['field']}}" class="{{$dataform['field']}} form-control" style="width: 100%;" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
                <option value="">{{$dataform['default']}}</option>
              </select>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
              <script type="text/javascript">
                $(".{{$dataform['field']}}").on("select2:select", function(e) {
                  $("#id{{$dataform['field']}}").val(e.params.data.id);
                  $("#kd{{$dataform['field']}}").val(e.params.data.kode);
                  $("#nm{{$dataform['field']}}").val(e.params.data.nama);

                  if (this.id == 'uKdSkpd') {
                    // var kd = e.added.id;
                    document.getElementById("uKd").value = e.params.data.kode;
                  }
                  if (this.id == 'progUnitKd') {
                    // var kd = e.added.id;
                    document.getElementById("progKd").value = e.params.data.kode;
                  }
                  if (this.id == 'progUkd') {
                    var kd = '.' + e.params.data.kode;
                    document.getElementById("progKd").value = document.getElementById("progUnitKd").value + kd;
                  }
                  if (this.id == 'progBuKd') {
                    var kd = '.' + e.params.data.kode;
                    document.getElementById("progKd").value = document.getElementById("progUnitKd").value+ '.' +document.getElementById("progUkd").value + kd;
                  }

                  // if (this.id == 'pKd') {
                  //   var kd = '.' + e.params.data.kode;
                  //   // alert(e.params.data.kode+'kd.length->' +kd.length);
                  //   // if (kd.length > 1){kd= '.0'+kd} else  {kd= '.0'+kd}
                  //   document.getElementById("progNm").value = e.params.data.nama;
                  //   document.getElementById("progKd").value = document.getElementById("progUnitKd").value + kd;
                  // }
                  
                  if (this.id == 'pKd') {
                    var kd = '.' + e.params.data.kode;
                    document.getElementById("progNm").value = e.params.data.nama;
                    document.getElementById("progKd").value = document.getElementById("progUnitKd").value+ '.' +document.getElementById("progUkd").value + '.' +document.getElementById("progBuKd").value + kd;
                  }


                  if (this.id == 'kKd') {
                    var kd = '.' + e.params.data.kode;
                    // alert(e.params.data.kode+'kd.length->' +kd.length);
                    // if (kd.length > 1){kd= '.0'+kd} else  {kd= '.0'+kd}
                    document.getElementById("kegNm").value = e.params.data.nama;
                    document.getElementById("kegKd").value = document.getElementById("kegProgKd").value + kd;
                  }

                  if (this.id == 'skKd') {
                    var kd = '.' + e.params.data.kode;
                    // alert(e.params.data.kode+'kd.length->' +kd.length);
                    // if (kd.length > 1){kd= '.0'+kd} else  {kd= '.0'+kd}
                    document.getElementById("skegNm").value = e.params.data.nama;
                    document.getElementById("skegKd").value = document.getElementById("skegKegKd").value + kd;
                  }





                  if (this.id == 'kegProgKd') {
                    // var kd = e.added.id;
                    document.getElementById("kegKd").value = e.params.data.kode;
                  }

                  if (this.id == 'skegKegKd') {
                    // var kd = e.added.id;
                    document.getElementById("skegKd").value = e.params.data.kode;
                  }

                  if (this.id == 'srobjRobjKd') {
                    // var kd = e.added.id;
                    document.getElementById("srobjKd").value = e.params.data.kode;
                  }

                  if (this.id == 'robjObjekKd') {
                    // var kd = e.added.id;
                    document.getElementById("robjKd").value = e.params.data.kode;
                  }
                  if (this.id == 'objekJenisKd') {
                    // var kd = e.added.id;
                    document.getElementById("objekKd").value = e.params.data.kode;
                  }
                  if (this.id == 'jenisKelompokKd') {
                    // var kd = e.added.id;
                    document.getElementById("jenisKd").value = e.params.data.kode;
                  }
                  if (this.id == 'kelompokAkunKd') {
                    // var kd = e.added.id;
                    document.getElementById("kelompokKd").value = e.params.data.kode;
                  }

                  //   array('kegKd', 'mskKd', 'kegNm', 'kegProgKd', 'kegJns');



                }).select2({
                  placeholder: "{{$dataform['default']}}",
                  ajax: {
                    url: "{{$dataform['url']}}?text={{$dataform['text']}}",
                    dataType: 'json',
                    delay: 250,
                    data: function(data) {
                      return {
                        search: data.term,
                      };
                    },
                    processResults: function(response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }
                });
              </script>
            </div>
          </div>
          @elseif($dataform['type']=='multiple')
          <div class="col-sm-{{$dataform['col'] ?? 12}}">
            <div class="form-group">
              <label class="form-label"><b>{{$dataform['label']}}</b></label>
              <select name="{{$dataform['field']}}" id="{{$dataform['field']}}" class="{{$dataform['field']}} form-control" multiple="multiple" style="width: 100%;" @if(!empty($dataform['disabled'])) {{$dataform['disabled']}} @endif>
                <option value="">{{$dataform['default']}}</option>
              </select>
              <small class="form-text text-muted">{{$dataform['keterangan']}}</small>
              <script type="text/javascript">
                $(".{{$dataform['field']}}").on("select2:select", function(e) {

                }).select2({
                  placeholder: "{{$dataform['default']}}",
                  ajax: {
                    url: "{{$dataform['url']}}",
                    dataType: 'json',
                    delay: 250,
                    data: function(data) {
                      return {
                        search: data.term,
                      };
                    },
                    processResults: function(response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }
                });
              </script>
            </div>
          </div>
          @endif
          @endforeach
        </div>
        <div class="text-right">
          <button type="submit" class="btn btn-sm btn-primary" onclick="save();praloader();"><i class="icon-floppy-disk"> </i> Save</button>
        </div>
        <!-- </form> -->
      </div>
    </div>
    <!-- /basic layout -->

  </div>
</div>

<div id="myModal" class="modal fade" role="dialog" >
  <div class="modal-dialog modal-xs" style="width:100%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>

      <div class="modal-body">
        

      <div class="row">
      <div class="col-md-12">

      <div class="form-group">
      <div class="input-group">
      <input type="hidden" name="kolom" id="kolom"  class="form-control">
      <input type="hidden" name="baris" id="baris"  class="form-control">
      <input type="text" name="idfield" id="idfield"  class="form-control">
      </div>
      </div>
        <br>
      </div>

      </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" onclick="savefield()">OK</button>
        </div>
        </div>
        
      </div>
    </div>

<script type="text/javascript">
  
  function editfield(element){    
    
    var nama = "{{$mainroute}}";
    
    if(nama == 'facelklra' || nama == 'facelklpsal' || nama == 'facelkneraca' || nama == 'facelklak' || nama == 'facelklo' || nama == 'facelklpe'){
    var x =  document.getElementById('cancelview').style.display;
    if(x != 'none'){
    var column = element.cellIndex;
    var row = element.parentNode.rowIndex;
    var tabel=document.getElementById('tData');

    let value = tabel.rows[row].cells[column].innerHTML;
    document.getElementById('idfield').value=value;
    document.getElementById('kolom').value=column;
    document.getElementById('baris').value=row;
    
    $('#myModal').modal('show');
    }
  }
  }
  
  function savefield(){
    var value = document.getElementById('idfield').value;
    let column = document.getElementById('kolom').value;
    let row = document.getElementById('baris').value;
    var tabel=document.getElementById('tData');
    
    tabel.rows[row].cells[column].innerHTML = value;
    $('#myModal').modal('hide');
    
  }

  function editview(id) {
    var nama = "{{$mainroute}}";
    for(var i= 1; i<=id; i++){
      document.getElementById('dropmove'+i).style.display = "";
      document.getElementById('dropmove'+i).style.display = "";
      if(nama == 'facelklak'){
        document.getElementById('dropmovelak'+i).style.display = "";
      }
    }
    document.getElementById("cancelview").style.display = "";
    document.getElementById("editview").style.display = "none";
    document.getElementById("accview").style.display = "";
  }

  function cancelview(id) {
    var nama = "{{$mainroute}}";
    for(var i= 1; i<=id; i++){
      document.getElementById('dropmove'+i).style.display = "none";
      if(nama == 'facelklak'){
        document.getElementById('dropmovelak'+i).style.display = "none";
      }
    }
    document.getElementById("cancelview").style.display = "none";
    document.getElementById("editview").style.display = "";
    document.getElementById("accview").style.display = "none";
  }

  function accview(){
    alertify.confirm('Yakin Anda Mengupdate Data ?',
    function() {
    praloader();

    var field = document.getElementById('formAllField').value;
    var fieldobj = JSON.parse(field);
    var postdata = {};
    postdata._token = document.getElementsByName('_token')[0].defaultValue;
    postdata.compId = document.getElementById('compId').value;
    postdata.alldata = document.getElementById("countform").value;

    var tabel=document.getElementById('tData');
    var nrow=tabel.rows.length;
    let idxid = [];
    var postData=new Object();
    for(var i = 1; i <= nrow-1; i++){
        let jcell = tabel.rows[i].cells.length;
        idxid[i] = tabel.rows[i].cells[0].innerText;
        let idxid2 = [];
        for(var j = 0; j <= jcell-2; j++){
            // console.log(j);
            idxid2[j]=tabel.rows[i].cells[j].innerHTML;

        }
        
        postdata[i]=idxid2;
      }
      
    // console.log(postdata);
    
    $.ajax({
      type: "POST",
      url: "/{{$mainroute}}/saveview",
      data: (postdata),
      dataType: "json",
      async: false,
      success: function(data) {
        praloaderend();
          alertify.success('Berhasil Disimpan');
          setTimeout(function() {
            window.open("{{$mainroute}}", "_self");
          }, 500);
      },
      error: function(dataerror) {
        praloaderend();
        console.log(dataerror);
      }
    });
    alertify.success('Berhasil Disimpan');
       window.open("{{$mainroute}}", "_self");
   },
      function() {
        alertify.dismissAll();
      }).setHeader('<b> Update Data !</b> ');


  }

  function save() {
    // praloader();
    var jenis = document.getElementById('{{$primaryKey}}').value;
    if (jenis == '') {
      saveNew('{{$primaryKey}}');
    } else {
      saveEdit('{{$primaryKey}}');
    }
  }

  function convert64(element) {
    $("#formsubmit").prop("disabled", true);
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
      document.getElementById(element.id + '_hidden').value = reader.result;
      $("#formsubmit").removeAttr('disabled');
    }
    reader.readAsDataURL(file);
  };

  function saveNew(primaryKey) {
    var field = document.getElementById('formAllField').value;
    var fieldobj = JSON.parse(field);
    var postdata = {};
    postdata._token = document.getElementsByName('_token')[0].defaultValue;
    postdata.compId = document.getElementById('compId').value;

    for (var j = 0; j < fieldobj.length; j++) {
      if (fieldobj[j].type == 'image') {
        var data64 = document.getElementById(fieldobj[j].field + '_hidden').value;
        var evalText = 'postdata.' + fieldobj[j].field + "='" + data64 + "'";
        eval(evalText);
      } else if (fieldobj[j].type == 'angka') {
        var a = $('#' + fieldobj[j].field).val();
        var data = document.getElementById(fieldobj[j].field).value;
        var evalText = 'postdata.' + fieldobj[j].field + "='" + convertAutoNumberDot(data) + "'";
        eval(evalText);
      } else {
        var data = document.getElementById(fieldobj[j].field).value;
        if ("{{$mainroute}}" == "facelklra" || "{{$mainroute}}" == "facelklo" || "{{$mainroute}}" == "facelkneraca" || "{{$mainroute}}" == "facelklpsal" || "{{$mainroute}}" == "facelklak" || "{{$mainroute}}" == "facelklpe") {
          var evalText = "postdata." + fieldobj[j].field + '="' + data + '"';
        } else {
          var evalText = 'postdata.' + fieldobj[j].field + "='" + data + "'";
        }
        eval(evalText);
      }
    }
    // console.log(postdata);
    $.ajax({
      type: "POST",
      url: "/{{$mainroute}}",
      data: (postdata),
      dataType: "json",
      async: false,
      success: function(data) {
        praloaderend();
        if (data.status == 401) {
          setTimeout(function() {
            $(".praloader").fadeOut();
            alertify.error('Form Wajib Harus diisi');
          }, 100);
          return;
        } else {
          alertify.success('Berhasil Disimpan');
          setTimeout(function() {
            window.open("{{$mainroute}}", "_self");
          }, 500);
        }
      },
      error: function(dataerror) {
        praloaderend();
        console.log(dataerror);
      }
    });

  }

  function saveEdit(primaryKey) {
    // console.log('saveEdit');
    var field = document.getElementById('formAllField').value;
    var fieldobj = JSON.parse(field);
    var pkValue = document.getElementById(primaryKey).value;
    var postdata = {};
    postdata._token = document.getElementsByName('_token')[0].defaultValue;
    postdata.compId = document.getElementById('compId').value;

    for (var j = 0; j < fieldobj.length; j++) {
      if (fieldobj[j].type == 'image') {
        var data64 = document.getElementById(fieldobj[j].field + '_hidden').value;
        var evalText = 'postdata.' + fieldobj[j].field + "='" + data64 + "'";
        eval(evalText);
      } else if (fieldobj[j].type == 'angka') {
        var a = $('#' + fieldobj[j].field).val();
        var data = document.getElementById(fieldobj[j].field).value;
        var evalText = 'postdata.' + fieldobj[j].field + "='" + convertAutoNumberDot(data) + "'";
        eval(evalText);
      } else {
        var a = $('#' + fieldobj[j].field).val();
        var data = document.getElementById(fieldobj[j].field).value;
        if ("{{$mainroute}}" == "facelklra" || "{{$mainroute}}" == "facelklo" || "{{$mainroute}}" == "facelkneraca" || "{{$mainroute}}" == "facelklpsal" || "{{$mainroute}}" == "facelklak" || "{{$mainroute}}" == "facelklpe") {
          var evalText = "postdata." + fieldobj[j].field + '="' + data + '"';
        } else {
          var evalText = 'postdata.' + fieldobj[j].field + "='" + data + "'";
        }
        eval(evalText);
      }
    }

    // console.log(postdata);
    $.ajax({
      type: "PUT",
      url: "/{{$mainroute}}/" + pkValue,
      data: (postdata),
      dataType: "json",
      async: false,
      success: function(data) {
        // console.log(data);
        praloaderend();
        if (data.status == 401) {
          setTimeout(function() {
            $(".praloader").fadeOut();
            alertify.error('Form Wajib Harus diisi');
          }, 100);
          // praloaderend();
          return;
        } else {
          alertify.success('Berhasil Diupdate');
          setTimeout(function() {
            window.open("{{$mainroute}}", "_self");
          }, 500);
        }
      },
      error: function(dataerror) {
        praloaderend();
        console.log(dataerror);
      }
    });

  }

  function endloader() {
    praloaderend();
  }

  function grid_edit(id, primaryKey) {
    var data = document.getElementById('alldata').value;
    var dataobj = JSON.parse(data).data;
    for (var i = 0; i < dataobj.length; i++) {
      var a = 'dataobj[i].' + primaryKey.id;
      // console.log(a);
      if (eval(a) == id) {
        var field = document.getElementById('formAllField').value;
        var fieldobj = JSON.parse(field);
        //masukkan PK dulu
        document.getElementById(primaryKey.id).value = id;
        //masukkan field yang lain
        for (var j = 0; j < fieldobj.length; j++) {
          var b = 'dataobj[i].' + fieldobj[j].field;
          // console.log(fieldobj[j].type);
          if (fieldobj[j].type != 'password') {
            if (fieldobj[j].type == 'combo') {
              $("#" + fieldobj[j].field).val(eval(b)).find(':selected').trigger('change');
            } else if (fieldobj[j].type == 'autocomplete') {
              setAutocompleteVal(fieldobj[j].url, eval(b), fieldobj[j].text, fieldobj[j].field);
            } else if (fieldobj[j].type == 'angka') {
              document.getElementById(fieldobj[j].field).value = comma(convertAutoNumberDot2(eval(b)));
            } else if (fieldobj[j].type == 'image') {
              // document.getElementById(fieldobj[j].field).value = String(eval(b));
            } else {
              document.getElementById(fieldobj[j].field).value = eval(b);
            }
          }
        }
      }
    }
  }

  function setAutocompleteVal(api, idx, tx, field) {
    $.ajax({
      type: "GET",
      url: api,
      data: ({
        text: eval(tx),
        search: idx
      }),
      dataType: "json",
      success: function(data) {
        if (data[0].id) {
          // Set selected   
          var $newOption = $("<option selected='selected'></option>").val(data[0].id).text(data[0].text);
          $("#" + field).append($newOption).trigger('change');
        } else {
          $('#' + field).val(null).trigger('change');
        }

      }
    });
  }

  function grid_delete(id, pmkey) {
    var postdata = {};
    postdata._token = document.getElementsByName('_token')[0].defaultValue;

    alertify.confirm('Anda Akan Menghapus Data ?',
      function() {
        praloader();
        $.ajax({
          type: "DELETE",
          url: "/{{$mainroute}}/" + id,
          data: (postdata),
          dataType: "json",
          async: false,
          success: function(data) {
            praloaderend();
            alertify.success('Berhasil Dihapus');
            setTimeout(function() {
              window.open("{{$mainroute}}", "_self");
            }, 500);
          },
          error: function(dataerror) {
            praloaderend();
            console.log(dataerror);
          }
        });
      },
      function() {
        alertify.dismissAll();
      }).setHeader('<b> Hapus Data !</b> ');

  }
</script>


<x-templete_bottom />