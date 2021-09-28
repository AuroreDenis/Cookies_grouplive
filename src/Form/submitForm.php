
    public function submitForm(array &$form, FormStateInterface $form_state) {
        parent::submitForm($form, $form_state);
       
        $this->config('cookies_grouplive.adminsettings')
                ->set('couleur1', $form_state->getValue('couleur1'))
                ->set('couleur2', $form_state->getValue('couleur2'))
                ->set('description', $form_state->getValue('description'))
                ->save();
    }