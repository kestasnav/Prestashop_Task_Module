<form method="POST">

<div class="panel">
    <div class="panel-heading"

         {l s='Configuration' mod='taskmodule'}
</div>
<div class="panel-body">

    <div>
        <div>
    <label for="task_name" class="form-label"> {l s='Užduoties pavadinimas' mod='taskmodule'}</label>
    <input class="form-control" type="text" name="task_name" id="task_name" placeholder="Užduotis" value="{$TASKMODULE_STR}">
    </div>

        <div class="row-margin-top">
    <label class="form-label" for="tasks">{l s='Užduoties sunkumas' mod='taskmodule'}</label>

    <select class="form-control" name="tasks" id="tasks">
        <option {if $TASKS_STR == Lengva}selected{/if} value="Lengva">Lengva</option>
        <option {if $TASKS_STR == Vid}selected{/if} value="Vid">Vidutiniškai sunki</option>
        <option {if $TASKS_STR == Sunki}selected{/if} value="Sunki">Sunki</option>
    </select>

        <div class="row-margin-top">
        <button name="savebutton" type="submit" class="btn btn-default"><i class="process-icon-save"></i>
            {l s='Išsaugoti' mod='taskmodule'}</button>
        </div>

</div>
</div>

</form>

