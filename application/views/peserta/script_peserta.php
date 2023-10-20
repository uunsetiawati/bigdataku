<script type="text/javascript">
  function ukmkoperasi()
    {
        var x = document.getElementById("pilihtipe").value;      

        if(x==""){

            document.getElementById("koperasi").style.display = 'none';
			      document.getElementById("ukm").style.display = 'none';
            document.getElementById("foto").style.display = 'none';
            document.getElementById("btnsubmit").style.display = 'none';
            
        }else if(x=="KOPERASI"){

            document.getElementById("koperasi").style.display = 'block';           
            document.getElementById("ukm").style.display = 'none';
            document.getElementById("foto").style.display = 'block';
            document.getElementById("btnsubmit").style.display = 'block';
            setRequired(false);
            
        }else if(x=="UKM"){
          
            document.getElementById("koperasi").style.display = 'none';            
            document.getElementById("ukm").style.display = 'block';
            document.getElementById("foto").style.display = 'block';
            document.getElementById("btnsubmit").style.display = 'block';
            setRequiredkop(false);            
        }
        
    }

    function setRequired(val){
        input = document.getElementById("ukm").getElementsByTagName('input');
        for(i = 0; i < input.length; i++){
            input[i].required = val;
        }
    }
    function setRequiredkop(val){
        input = document.getElementById("koperasi").getElementsByTagName('input');
        select = document.getElementById("koperasi").getElementsByTagName('select');
        for(i = 0; i < input.length; i++){
            input[i].required = val;
        }
        for(a = 0; a < select.length; a++){
            select[a].required = val;
        }
    }
    function setRequiredfoto(val){
        input = document.getElementById("foto").getElementsByTagName('input');
        for(i = 0; i < input.length; i++){
            input[i].required = val;
        }
    }
	function toggleselect() {
		var select1 = document.getElementById("provinsi");
		var select2 = document.getElementById("kota");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}
	function toggleselect2() {
		var select1 = document.getElementById("kota");
		var select2 = document.getElementById("kecamatan");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}
	function toggleselect3() {
		var select1 = document.getElementById("kecamatan");
		var select2 = document.getElementById("kelurahan");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}	
	
  $(document).ready(function(){
    $('#provinsi').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kota');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
		  		html='<option value="" selected disabled>PILIH KAB/KOTA</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kota').html(html);         
        }
      });
    });
    $('#kota').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kecamatan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
		  		html='<option value="" selected disabled>PILIH KECAMATAN</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kecamatan').html(html);         
        }
      });
    });
    $('#kecamatan').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kelurahan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
				html='<option value="" selected disabled>PILIH KELURAHAN</option>';
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kelurahan').html(html);         
        }
      });
    });	
  });

  function tsprov() {
		var select1 = document.getElementById("prov_koperasi");
		var select2 = document.getElementById("kota_koperasi");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}
	function tskota() {
		var select1 = document.getElementById("kota_koperasi");
		var select2 = document.getElementById("kec_koperasi");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}
	function tskec() {
		var select1 = document.getElementById("kec_koperasi");
		var select2 = document.getElementById("kel_koperasi");

		// Periksa apakah select pertama dipilih
		if (select1.value !== "") {
			select2.disabled = false; // Aktifkan select kedua
		} else {
			select2.disabled = true; // Nonaktifkan select kedua
		}
	}

//alamat koperasi
  $(document).ready(function(){
    $('#prov_koperasi').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kota');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
		  		html='<option value="" selected disabled>--PILIH KAB/KOTA--</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kota_koperasi').html(html);         
        }
      });
    });
    $('#kota_koperasi').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kecamatan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
		  		html='<option value="" selected disabled>--PILIH KECAMATAN--</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kec_koperasi').html(html);         
        }
      });
    });
    $('#kec_koperasi').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kelurahan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
				html='<option value="" selected disabled>--PILIH KELURAHAN--</option>';
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kel_koperasi').html(html);         
        }
      });
    });	
  });

  /* Dengan Rupiah */
  // var dengan_rupiah = document.getElementById('dengan-rupiah');
  //   dengan_rupiah.addEventListener('keyup', function(e)
  //   {
  //       dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
  //   });

  // var dengan_rupiah2 = document.getElementById('dengan-rupiah2');
  // dengan_rupiah2.addEventListener('keyup', function(e)
  // {
  //     dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
  // });
    
  //   /* Fungsi */
  //   function formatRupiah(angka, prefix)
  //   {
  //       var number_string = angka.replace(/[^,\d]/g, '').toString(),
  //           split    = number_string.split(','),
  //           sisa     = split[0].length % 3,
  //           rupiah     = split[0].substr(0, sisa),
  //           ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
  //       if (ribuan) {
  //           separator = sisa ? '.' : '';
  //           rupiah += separator + ribuan.join('.');
  //       }
        
  //       rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  //       return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  //   }
 
</script>