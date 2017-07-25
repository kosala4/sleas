<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        
            <?php echo $user_name; ?>
            <?php echo $passwd; ?>

            <div class="col-md-12" style="margin-top:100px;">
                <table border="0" width="100%">
                    <tr>
                        <td valign="top">
                            <p style="text-align:center;">
                                .......................<br>
                                ජ්‍යෙෂ්ඨ සහකාර ලේකම්<br>
                                (අධ්‍යාපන සේවා ආයතන)
                            </p>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td valign="top">
                            <p style="text-align:center;">
                                .......................<br>
                                අ/කලේ<br>
                                ලේකම්<br>
                                (අධ්‍යාපන අමාත්‍යාංශය)
                            </p>
                            
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <p>පිටපත්-</p>
                <ol>
                    <li>ලේකම්, රාජ්‍ය සේවා කොමිෂන් සභාව</li>
                    <li>පළාත් අධ්‍යාපන අධ්‍යක්ෂ - <?php echo $province[0]['province'] ?> Province</li>
                    <li>ජාතික පාසල් අධ්‍යක්ෂ</li>
                    <li>කලාප අධ්‍යාපන අධ්‍යාක්ෂ  - <?php echo $province[0]['province'] ?> Province</li>
                    <li>විදුහල්පති - <?php echo $province[0]['province'] ?> Province</li>
                    <li>පෞද්ගලික ලිපිගොනුව</li>
                </ol>
            </div>