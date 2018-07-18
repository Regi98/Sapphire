<script>

<?php

                        $results2 = mysqli_query($con, "SELECT * FROM scratch_cards WHERE code = 'J37FDI102' and pin = '543'");
                        $numResults = mysqli_num_rows($results2);
                        $rowcard = mysqli_fetch_assoc($results2);
                        //variables
                        $time = time();
                        $current_date = date("Y-m-d",$time);
                        $expiration = $rowcard['card_expiration'];
                        $status = $rowcard['status'];

                        if ($numResults == 1) {
                            if ($status != 'A') { ?>
                              $.alert({
                                title: 'Invalid transaction!',
                                content: 'Card has already been used.',
                              });
                        <?php
                            }
                             if ($current_date >  $expiration) { ?>
                              $.alert({
                                title: 'Invalid transaction!',
                                content: 'Card has expired.',
                              });
                        <?php
                            }  if($status == 'A' && $current_date < $expiration) {
                                $current_ewallet = $num['ewallet'];
                                $amount = $rowcard['amount'];
                                $updated_ewallet = $current_ewallet + $amount;
                                // $delsql = "DELETE * FROM scratch_cards WHERE code = $code and pin = $pin";
                        ?>
                                
                                alert("completo");
                                alert("<?php echo  $expiration; ?>");
                                alert("<?php echo  $current_date; ?>")
                        <?php
                            }
                        } else { ?>
                            $.alert({
                                title: 'Invalid transaction!',
                                content: 'Wrong code',
                            });
                            <?php
                        }
                        ?>
                        </script>