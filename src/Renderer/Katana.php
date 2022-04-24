<?php

namespace Framework\Renderer;

class Katana
{
    public function __construct(
        public string $layout = 'layout',
        public array $fields = ['title', 'body']
    ) {}

    public function withFields(array $fields = [])
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function render($values = []): string
    {
        $path = view_path($this->layout . '.html');

        $template = file_get_contents($path);

        foreach ($this->fields as $field) {
            $replacement = "";

            if (array_key_exists($field, $values)) {
                $replacement = $values[$field];
            }

            $template = str_replace('@{' . $field . '}', $replacement, $template);
        }

        return $template;
    }
}