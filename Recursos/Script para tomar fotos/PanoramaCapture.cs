using System.Collections;
using System.Collections.Generic;
using UnityEngine.Rendering;
using UnityEngine;

public class PanoramaCapture : MonoBehaviour
{
    public int i;
    public Camera targetCamera;
    public RenderTexture cubeMapLeft;
    public RenderTexture equirectRT;

    void Update()
    {
        if (Input.GetKeyDown(KeyCode.Space))
            Capture();
    }


    public void Capture()
    {
        targetCamera.RenderToCubemap(cubeMapLeft);
        cubeMapLeft.ConvertToEquirect(equirectRT);
        Save(equirectRT);

    }

    public void Save(RenderTexture rt)
    {
        Texture2D tex = new Texture2D(rt.width, rt.height);
        RenderTexture.active = rt;
        tex.ReadPixels(new Rect(0, 0, rt.width, rt.height), 0, 0);
        RenderTexture.active = null;

        byte[] bytes = tex.EncodeToJPG();
        
        string path = Application.dataPath + "/Imagenes360/Panorama(" + i + ").jpg";
        System.IO.File.WriteAllBytes(path, bytes);
        i++;
    }
}
