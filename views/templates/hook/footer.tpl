<div class="col-md-12 customerContainer">
<div class="">

<div class="panel">
    <div class="panel-heading mb-1"><h1>Vartotojo informacija</h1></div>
    <div class="panel-body">

        <form method="POST">

        <div class="mb-1">
        <label class="form-label" for="tasks">{l s='Vardas' mod='taskmodule'}</label>
        <input class="form-control" type="text" name="customer_name" placeholder="Įrašykite vardą" required>
        </div>

        <div class="mb-1">
        <label class="form-label" for="tasks">{l s='Pavardė' mod='taskmodule'}</label>
        <input class="form-control" type="text" name="customer_surname" placeholder="Įrašykite pavardę" required>
        </div>

        <div class="mb-1">
        <label class="form-label" for="tasks">{l s='El. Paštas' mod='taskmodule'}</label>
        <input class="form-control" type="email" name="customer_email" placeholder="Įrašykite el. paštą" required>
        </div>

        <div class="mb-1">
        <button name="customer_save" type="submit" class="btn btn-default"><i class="process-icon-save"></i>
            {l s='Išsaugoti' mod='taskmodule'}</button>
        </div>

        </form>

    </div>
    </div>

</div>
</div>

