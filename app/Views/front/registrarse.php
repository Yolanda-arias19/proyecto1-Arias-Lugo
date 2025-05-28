<?php if(!empty (session()->getFlashdata('fail'))):?>
    <div class="alert alert-danger alert-dismissible"><?=session()->getFlashdata('fail');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif?>

<?php if(!empty (session()->getFlashdata('success'))):?>
    <div class="alert alert-success alert-dismissible"><?=session()->getFlashdata('success');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif?> 

<section>
    <h1>Registrarse</h1>
    

</section>
