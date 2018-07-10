<div>
    <h3>Edit Person</h3>
    <?= $this->Form->create($person) ?>
    <fieldset>
        <?php
            echo $this->Form->control('id');
            echo $this->Form->control('name');
            echo $this->Form->control('age');
            echo $this->Form->control('mail');
        ?>
    </fieldset>
    <?= $this->Form->button('Submit') ?>
    <?= $this->Form->end() ?>
</div>
