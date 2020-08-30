$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}});var table=$("#tableUsers").DataTable({processing:!0,serverSide:!0,info:!1,ajax:{url:"api/users"},columns:[{data:"registration",name:"registration"},{data:"name",name:"name"},{data:"email",name:"email"},{data:"status",name:"status"},{data:"description",name:"description"},{data:"action",name:"action",orderable:!1,searchable:!1}],autowidth:!1,language:{sEmptyTable:"Nenhum registro encontrado",sInfo:"Mostrando de _START_ até _END_ de _TOTAL_ registros",sInfoEmpty:"Mostrando 0 até 0 de 0 registros",sInfoFiltered:"(Filtrados de _MAX_ registros)",sInfoPostFix:"",sInfoThousands:".",sLengthMenu:"_MENU_ resultados por página",sLoadingRecords:"Carregando...",sProcessing:"Processando...",sZeroRecords:"Nenhum registro encontrado",sSearch:"Pesquisar",oPaginate:{sNext:"Próximo",sPrevious:"Anterior",sFirst:"Primeiro",sLast:"Último"},oAria:{sSortAscending:": Ordenar colunas de forma ascendente",sSortDescending:": Ordenar colunas de forma descendente"}},columnDefs:[{targets:"_all",className:"text-center"}]});$(".addUser").click(function(e){e.preventDefault(),$.ajax({type:"GET",url:"api/categories",success:function(e){0==$.isEmptyObject(e.data)?($.each(e.data,function(e,a){$("#category").append($("<option></option>").attr("value",a.id).text(a.description))}),$("#modalAddUser").modal("show")):Swal.fire("Por favor, cadastre as categorias!","","warning")}})}),$("#cancelNewUser","#cancelNewUser1").click(function(e){$("#category").empty().append('<option value="error">Escolha a categoria</option>')}),$("#createNewUser").click(function(){$(this).attr("disabled","disabled").text("Cadastrando...");let e=$('meta[name="csrf-token"]').attr("content");var a=$("#newUser").serialize()+"&_token="+e;console.log(a),$.ajax({type:"POST",url:"api/users",data:a,success:function(e){table.draw(),$("#modalAddUser").modal("hide"),$("#createNewUser").removeAttr("disabled","disabled").text("Cadastrar"),$("#category").empty().append('<option value="error">Escolha a categoria</option>'),$("#newUser").trigger("reset"),Swal.fire("Cadastrado!",e.success,"success")},error:function(e,a,t){console.log(a),console.log(t),console.log(e)}})}),$("body").on("click",".deleteUser",function(){var e=$(this).data("id");let a=`api/users/${e}`;$.ajax({url:a,type:"GET",success:function(a){a&&Swal.fire({position:"top",title:"Essa ação é irreversível",text:"Tem certeza que deseja excluir o "+a[0].name+" de matricula "+a[0].registration,icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Deletar"}).then(a=>{if(a.value){let a=$('meta[name="csrf-token"]').attr("content");$.ajax({type:"DELETE",url:`api/users/${e}`,data:{_token:a},success:function(e){table.draw(),Swal.fire({position:"top",title:"Excluido!",text:e.success,icon:"success"})}})}})},error:function(e,a,t){console.log(a),console.log(t),console.log(e)}})});
