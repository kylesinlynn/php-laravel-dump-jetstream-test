<div>
    <input type="hidden" wire:model='selectedId'>
    <div class="form-group">
        <lable id="exampleInputPassword1">Enter name</lable>
        <input type="text" class="form-control input-sm" placeholder="Name" wire:model='name'>
    </div>
    <div class="form-group">
        <lable>Enter email</lable>
        <input type="email" class="form-control input-sm" placeholder="Email" wire:model='email'>
    </div>
    <button wire:click='update()' class="btn btn-secondary">update</button>
</div>