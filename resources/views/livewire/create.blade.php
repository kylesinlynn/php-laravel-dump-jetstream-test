<div>
    <div class="form-group">
        <lable id="exampleInputPassword1">Enter name</lable>
        <input type="text" class="form-control input-sm" placeholder="Name" wire:model='name'>
    </div>
    <div class="form-group">
        <lable>Enter email</lable>
        <input type="email" class="form-control input-sm" placeholder="Email" wire:model='email'>
    </div>
    <button class="btn btn-primary" wire:click='store()'>submit</button>
</div>