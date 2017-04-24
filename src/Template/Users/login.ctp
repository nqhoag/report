<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
    <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>
            <fieldset>
                <legend>
                    <?= __('Please enter your username and password') ?>
                </legend>
                <div class="form-group">
  <label class="control-label" for="focusedInput">Focused input</label>
  <input class="form-control" id="focusedInput" type="text" value="This is focused...">
</div>
                <?= $this->Form->control('username', ["class" => "form-control"]) ?>
                    <?= $this->Form->control('password') ?>
            </fieldset>
            <?= $this->Form->button(__('Login')); ?>
                <?= $this->Form->end() ?>
</div>