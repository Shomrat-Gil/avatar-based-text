       <?PHP

       $text = "GS"; //The text which you want to show in image
       $target = "user_image_uuid.png"; //path of target where you want to save image

       $font = "./Fonts/arial.ttf"; //Path for the font to use

       $textColor = [
           'R' => 255,
           'G' => 255,
           'B' => 255,
        ];

        $imageWidth = 200; //width of your image
        $imageHeight = 200;// height of your image

        $fontSize = 38; // size of your font
        $angle = 0; //angle of your text

        $newImage = imagecreatetruecolor($imageWidth, $imageHeight); //create Image

        //Create transparent background
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        $col = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
        imagefill($newImage, 0, 0, $col);

        $color = imagecolorallocate($newImage, $textColor['R'], $textColor['G'], $textColor['B']); //Fill the font color

        // Get Bounding Box Size
        $text_box = imagettfbbox($fontSize, $angle, $font, $text);

        //Get Text Width and Height
        $text_width = $text_box[2] - $text_box[0];
        $text_height = $text_box[7] - $text_box[1];

        // Calculate center/middle coordinates of the text
        $x = ($imageWidth / 2) - ($text_width / 2);
        $y = ($imageHeight / 2) - ($text_height / 2);

        // Write the text
        imagettftext($newImage, $fontSize, $angle, $x, $y, $color, $font, $text);

        imagepng($newImage, $target); //save your image at new location $target
        imagedestroy($newImage);
        