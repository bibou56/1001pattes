<?php include('app/Views/front/header.php') ?>

<main class="content-dashboardAdmin container">
    <p id="countMails">Vous avez <span><?php $totalMail = $mailCount->fetch(); echo $totalMail[0]; ?></span> messages</p>
    
    <section id="allMails">
        <table id="tableMails">
            <thead>
                <tr>
                    <th>Nom et prénom</th>
                    <th class="mailAddress">email</th>
                    <th class="mailObject">Objet du message</th>
                    <th>Date d'envoi</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach($totalMessages as $messages){ ?>
                    <tr>
                        <td><?= $messages['lastname'], " " , $messages['firstname'] ?></td>
                        <td class="mailAddress"><?= $messages['mail'] ?></td>
                        <td class="mailObject"><?= $messages['objet'] ?></td>
                        <td><?= $messages['date'] ?></td>
                        <td class="UD-mail">
                            <a href="indexAdmin.php?action=eachMail&id=<?= $messages['id']; ?>"><img src="/app/Public/front/images/yeux.png" alt="logo oeil"></a>
                            <!-- <a href="indexAdmin.php?action=deleteMail&id=<?= $messages['id']; ?>"><img src="/app/Public/front/images/bin.png" alt="logo poubelle"></a> -->
                        </td>
                    </tr>
                <?php } 
                ?>
            </tbody>
        </table>
    </section>
    
</main>

<?php include('app/Views/front/footer.php') ?>