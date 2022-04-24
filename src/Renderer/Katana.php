<?php

namespace Framework\Renderer;

class Katana
{
    public function __construct(
        public string $layout = 'layouts/main',
        public array $fields = ['title', 'body']
    ) {}

    public function withFields(array $fields = [])
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function render($values = []): string
    {
        $path = view_path($this->layout . '.katana.php');

        $template = file_get_contents($path);

        foreach ($this->fields as $field) {
            $replacement = "";

            if (array_key_exists($field, $values)) {
                $replacement = $values[$field];
            }

            $template = str_replace('@{' . $field . '}', $replacement, $template);
        }

        $cachedFileName = str_replace('/', '_', $this->layout);
        $cachedFilePath = root_path('cache/' . $cachedFileName);

        file_put_contents($cachedFilePath, $template);

        ob_start();
        include $cachedFilePath;
        $result = ob_get_clean();

        return $result;
    }
}