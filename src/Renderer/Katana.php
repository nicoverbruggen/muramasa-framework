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

        return $this->process($template);
    }

    public function process(string $template): string 
    {
        $fileName = str_replace('/', '.', $this->layout);

        $cachedFilePath = root_path(
            'cache/' . time() . '-' . $fileName . '.kt.php'
        );
        
        file_put_contents($cachedFilePath, $template);

        $result = $this->buffer($cachedFilePath);

        unlink($cachedFilePath);

        return $result;
    }

    private function buffer(string $file): string
    {
        ob_start();

        include $file;
        
        return ob_get_clean();
    }
}