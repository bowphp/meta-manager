<?php

namespace Test;

use Bow\View\View;
use Spatie\Snapshots\MatchesSnapshots;
use Tintin\Compiler;
use Tintin\Tintin;

class MetaManagerTest extends \PHPUnit\Framework\TestCase
{
    use MatchesSnapshots;

    public function testCompileTheMetaView()
    {
        $compiler = new Compiler();
        $output = $compiler->compile(file_get_contents(__DIR__.'/../src/views/meta.tintin.php'));

        $this->assertStringContainsString('<meta property="fb:app_id" content="<?php echo htmlspecialchars(config(\'meta.fb_app_id\'), ENT_QUOTES); ?>"/>', $output);
        $this->assertMatchesTextSnapshot($output);
    }

    public function testCompileTheSpecialDirectiveStructure()
    {
        $kernel = KernelTesting::configure(__DIR__."/config");
        $kernel->boot();

        /**@var Tintin */
        $tintin = View::getInstance()->getEngine();
        $output = $tintin->getCompiler()->compile('%meta');

        $this->assertEquals(trim($output), '<?php echo $__tintin->getCompiler()->_____executeCustomDirectory("meta"); ?>');
        $this->assertMatchesTextSnapshot($output);
    }

    public function testCompileTheSpecialDirectiveStructureWithParam()
    {
        $kernel = KernelTesting::configure(__DIR__."/config");
        $kernel->boot();

        /**@var Tintin */
        $tintin = View::getInstance()->getEngine();
        $output = $tintin->getCompiler()->compile('%meta(["title" => "Yoo"])');

        $this->assertEquals(trim($output), '<?php echo $__tintin->getCompiler()->_____executeCustomDirectory("meta", ["title" => "Yoo"]); ?>');
        $this->assertMatchesTextSnapshot($output);
    }

    public function testCompileTheSpecialDirectiveStructureWithParamAndLinebracken()
    {
        $kernel = KernelTesting::configure(__DIR__."/config");
        $kernel->boot();

        /**@var Tintin */
        $tintin = View::getInstance()->getEngine();
        $output = $tintin->getCompiler()->compile('%meta([
            "title" => "Yoo"
        ])');

        $this->assertEquals(trim($output), '<?php echo $__tintin->getCompiler()->_____executeCustomDirectory("meta", [
            "title" => "Yoo"
        ]); ?>');
        $this->assertMatchesTextSnapshot($output);
    }
}
