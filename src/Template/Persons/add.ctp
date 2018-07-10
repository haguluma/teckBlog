<div>
    <h3>Add Person</h3>
    <?= $this->Form->create() ?>
    <fieldset>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('age');
        echo $this->Form->control('mail');
    ?>
    </fieldset>
    <?= $this->Form->button('Submit') ?>
    <?= $this->Form->end() ?>
</div>
