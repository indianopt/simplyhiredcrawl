                <?$cc = current_controller('home')?>
                <?$uri = $_SERVER['REQUEST_URI']?>
                <ul>
                    <li class="slogan"></li>
                    <?foreach($navigations as $nav) {
                        if(detect_local_controller($nav['url'], 'home') == $cc) {?>
                            <li class="active"><?=$nav['name']?></li>
                        <?}
                        else {?>
                            <li><a href="<?=$nav['url']?>"><?=$nav['name']?></a></li>
                        <?}
                    }?>
                </ul>