<?php
require_once 'autoload.php';

use App\Prototype\Manager\MenuManager;
use App\Prototype\Concretes\DeepCopyMenu;
use App\Prototype\Concretes\ShallowCopyMenu;

function executeCopy(MenuManager $manager, $menu_code) {
    // インスタンス生成
    $menu1 = $manager->create($menu_code);  // オリジナル
    $menu2 = $manager->create($menu_code);  // コピー

    // オリジナルのコメントを変更
    $menu1->cngComment(1, [ 'date' => '2018-06-27', 'comment' => '大盛サービスは終了しました。']);

    // 結果表示
    echo '<h2>オリジナル</h2>';
    echo $menu1->display();
    echo '<h2>コピー</h2>';
    echo $menu2->display();
    echo '<hr>';
}

// メニューマネージャーのインスタンス化
$manager = new MenuManager();


// ディープコピーインスタンス
$menu = new DeepCopyMenu('P001', 'ボロネーゼ', 1350, 'pasta');
$comments = new \stdClass();
$comments->comment[] = [
    'date' => '2018-06-23',
    'comment' => 'イタリアのトマトたっぷり。'
];
$comments->comment[] = [
    'date' => '2018-06-25',
    'comment' => '大盛無料です。'
];
$menu->setComments($comments);
$manager->register($menu);


// シャローコピーインスタンス
$menu = new ShallowCopyMenu('P002', 'ナポリタン', 1100, 'pasta');
$comments = new \stdClass();
$comments->comment[] = [
    'date' => '2018-06-23',
    'comment' => '昔なつかしい味に仕上げました。'
];
$comments->comment[] = [
    'date' => '2018-06-25',
    'comment' => '大盛無料です'
];
$menu->setComments($comments);
$manager->register($menu);

// この時点で、デーィプコピーインスタンスのボロネーゼとシャローコピーインスタンスのナポリタンがマネージャーに登録されている

// メニューコードを指定してオリジナルとコピーのインスタンスを作成＆表示
executeCopy($manager, 'P001');
executeCopy($manager, 'P002');
