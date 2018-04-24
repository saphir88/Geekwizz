<?php

namespace Controller;

use Model\TokenManager;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class MailController extends AbstractController
{
    protected $errors = [];
    protected $resultatprofil;
    protected $resultatgenre;
    protected $resultatage;

    public function mail()
    {
        //stock la première valeur de POST (age)
        $this->resultatage = current($_POST);

        //stock la dernière valeur de POST (genre)
        $this->resultatgenre = end($_POST);


        //supprime le premier et le dernier élément de POST
        array_shift($_POST);
        array_pop($_POST);

        //cherche l'occurence la plus forte de POST
        $array = array_count_values($_POST);
        foreach($array as $key => $value) {
            if ($value = max($array)) {
                $this->resultatprofil= $key;
                break;
            }
        }

        //valeur de age
        var_dump($this->resultatage);

        //valeur du profil
        var_dump($this->resultatprofil);

        //valeur du genre
        var_dump($this->resultatgenre);

        return $this->twig->render('Item/mail.html.twig', ['age'=>$this->resultatage, 'profil' => $this->resultatprofil, 'genre' => $this->resultatgenre]);
    }

    public function validateMail()
    {

        $validation = 0;
        $genre = $_POST['genre'];
        $tranche_age= $_POST['age'];
        $id_resultat= substr($_POST['profil'], -1);


        if(isset($_POST['envoyer'])) {
            $mail = $_POST['email'];// Déclaration de l'adresse de destination.

            $message =

                '<html>

                <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                    <table bgcolor="#000000" width="100%" border="0" cellpadding="0" cellspadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <table align="center" width="590px" border="0" cellpadding="0" cellspadding="0">
                                            <tbody>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!-- logo -->
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <a href="http://localhost:8000">
                                                            <img src="https://image.noelshack.com/fichiers-sm/2018/16/6/1524304701-logo.png" width="200" border="0" alt="Logo GeekWizz">
                                                        </a>
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!--couverture -->
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <img src="http://image.noelshack.com/fichiers/2018/16/6/1524307490-tyron.png" width="300" border="0" alt="Logo GeekWizz">
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!--titre -->
                                                <tr>
                                                    <td align="center" style="font-family: Helvetica, sans-serif; text-align: center; font-size:20px; color: #f30000; mso-line-height-rule: exactly; line-height: 26px">
                                                        MERCI D\'AVOIR REPONDU AU GEEKWIZZ !
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!-- texte -->
                                                <tr>
                                                    <td align="center" style="font-family: Helvetica, sans-serif; text-align: center; color: #a20000; mso-line-height-rule: exactly; line-height: 30px">
                                                        Vous pouvez dès à présent accéder à votre résultat en cliquant sur le lien suivant :
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!-- lien -->
                                                <tr>
                                                    <td align="center" style="font-family: Helvetica, sans-serif; text-align: center; color: #F0F0F0; mso-line-height-rule: exactly; line-height: 30px">
                                                        <a href="#" style="color: whitesmoke">J\'accède à mon profil.</a>
                                                        <!-- !!!!!! GENERER LE LIEN TOKEN HREF !!!!!! -->
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                                <!-- copyright -->
                                                <tr>
                                                    <td align="center" style="font-size:12px; font-family: Helvetica, sans-serif; text-align: center; color: #424242; mso-line-height-rule: exactly; line-height: 30px">
                                                        Copyright © 2018 GeekWizz
                                                    </td>
                                                </tr>
                                                <!-- espace -->
                                                <tr>
                                                    <td height="30" style="font-size:30px; line-height:30px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </body>
                
                </html>';

            $sujet = "Ton Profil GeekWizz !";

            $header = "From: \"Team GeekWizz\"<geekwizz.wcs@gmail.com>" ."\r\n";
            $header .= "Reply-to: \"Team GeekWizz\"<geekwizz.wcs@gmail.com>" ."\r\n";
            $header .= "MIME-Version :1.0" ."\r\n";
            $header .= "Content-type:text/html; charset=UTF-8";

            if (isset($_POST['cond-mention']) && isset($_POST['email']) && !empty($_POST['cond-mention']) && !empty($_POST['email'])){
                $TokenManager = new TokenManager();
                $TokenManager->insertToken($validation, $mail, $genre, $tranche_age, $id_resultat);
                mail($mail,$sujet,$message,$header);
                header("location:/");
            } elseif (!isset($_POST['cond-mention']) || !empty($_POST['cond-mention'])) {
                $this->errors[] = "Veuillez accepter les conditions générales.";
                $error = true;
                return $this->twig->render("Item/mail.html.twig", ['errors' => $this->errors]);
            } elseif (!isset($_POST['email']) || !empty($_POST['email'])) {
                $this->errors[] = "Veuillez indiquer votre Email.";
                $error = true;
                return $this->twig->render("Item/mail.html.twig", ['errors' => $this->errors]);
            }
        } else {
            $this->errors[] = "Veuillez remplir les champs.";
            $error = true;
            return $this->twig->render("Item/mail.html.twig", ['errors' => $this->errors]);
        }
    }
}


