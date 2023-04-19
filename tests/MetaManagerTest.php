<?php

namespace Test;

use Tintin\Compiler;
use Tintin\Tintin;

class MetaManagerTest extends \PHPUnit\Framework\TestCase
{
    public function testCompileTheMetaView()
    {
        $compiler = new Compiler();
        $output = $compiler->compile(file_get_contents(__DIR__.'/../src/views/meta.tintin.php'));

        $this->assertStringContainsString('<meta property="fb:app_id" content="<?php echo htmlspecialchars(config(\'meta.fb_app_id\'), ENT_QUOTES); ?>"/>', $output);
    }
}
